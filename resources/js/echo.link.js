import { ApolloLink, Observable } from 'apollo-link';
import Echo from 'laravel-echo/dist/echo';

class EchoLink extends ApolloLink {
  constructor() {
    super();
    //const token = localStorage.getItem('token');
    const token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjNiYWQwMzAxMjNlODQ5MTY0MDE4OGYwZDE5ZWM2ZmIyYTVjNjIwODBlOWFjMTgxYTgwYWMxNTI1NDIzYmRkZTMzZDk2YzIwOGNiNDBkYTcwIn0.eyJhdWQiOiIyIiwianRpIjoiM2JhZDAzMDEyM2U4NDkxNjQwMTg4ZjBkMTllYzZmYjJhNWM2MjA4MGU5YWMxODFhODBhYzE1MjU0MjNiZGRlMzNkOTZjMjA4Y2I0MGRhNzAiLCJpYXQiOjE1NjgwNjIwNzIsIm5iZiI6MTU2ODA2MjA3MiwiZXhwIjoxNTk5Njg0NDcyLCJzdWIiOiIyMSIsInNjb3BlcyI6W119.KhvhUSFzH1mUEnrFvncUX_rTUeHfWjp34AI8fkXyX9u2dBwVmLoO65CFVka96ZRfQUEVjQ24GYukM3Uwt9Mi7XmuFEBDMuVu0ZPGGkRyoQ-3YJjfXhP2U7HnxD43OXsSLUGzhzNVgcsUYbyr3-O0npaGfoMe2KJHslJd3uOilVyeE-E-HuoUsmltFiO29Nx3sGufCENaVIo5bjZFQXmmFCAmxIKL2pwXU7MieW_JNblmj9AflrzVWDobKbTmIq4uj4KokLp2C97PjhmitZOF9H2-uUs5qBkjN1GEAcy268CWrxKQOnvaD3xnhCbc-_MhvqiQmIU-52T9X3Del7KhwfixNjsolUtDWootqhWUJ2Qh9uUIUwFXk2vDRFjCp4IEghHGz00ERNO44AYioqq6GrXxKF4cVobdUIY9MKMVsv0HF2bb_bMCOmbm2pvMGPeWMd7xgbSc-QiylRQ7C8Fa8CYDrYQ0ERJtWTPBsHDGlCGKh7HjZf4bTjUHZdtpQeb-dbZ7AWeKpxd1QH2OBVZpyu50vte2e2qkxq-1eiO9Jf1qIqYQ9pjf970ekbXiWC2ynwvvMQvZaUM-36bU0jfXRCrfAtKF3elMSZxg1na5TiSXFQQ0NG3dmwD_ttNWUlZ_Yi6s_976mVn-dZ5DyuDEcR5fygqIB9GIfQ-g5dS9i94';
    this.subscriptions = [];
    this.echo = new Echo({
      broadcaster: 'pusher',
      key: '01bbbd7da92fc31419e7',
      cluster: 'en',
      authEndpoint: `graphql/subscriptions/auth`,
      wsHost: window.location.hostname,
      wsPort: 6001,
      wssPort: 6001,
      disableStats: true,
      enabledTransports: ['ws', 'wss'],
      auth: {
        headers: {
          authorization: token ? `Bearer ${token}` : null,
        },
      },
    });
  }

  request(operation, forward) {
    return new Observable(observer => {
      // Check the result of the operation
      forward(operation).subscribe({
        next: data => {
          // If the operation has the subscription extension, it's a subscription
          const subscriptionChannel = this._getChannel(data, operation);

          if (subscriptionChannel) {
            this._createSubscription(subscriptionChannel, observer);
          } else {
            // No subscription found in the response, pipe data through
            observer.next(data);
            observer.complete();
          }
        },
      });
    });
  }

  _getChannel(data, operation) {
    return !!data.extensions &&
      !!data.extensions.lighthouse_subscriptions &&
      !!data.extensions.lighthouse_subscriptions.channels
      ? data.extensions.lighthouse_subscriptions.channels[operation.operationName]
      : null;
  }

  _createSubscription(subscriptionChannel, observer) {
    const privateChannelName = subscriptionChannel.split('private-').pop();

    if (!this.subscriptions.find(s => s.channel === subscriptionChannel)) {
      this.subscriptions.push({
        channel: subscriptionChannel,
        observer: observer,
      });
    }

    this.echo.private(privateChannelName).listen('.lighthouse-subscription', payload => {
      if (!payload.more || observer._subscription._state === 'closed') {
        this._leaveSubscription(subscriptionChannel, observer);
        return;
      }
      const result = payload.result;
      if (result) {
        observer.next({
          data: result.data,
          extensions: result.extensions,
        });
      }
    });
  }

  _leaveSubscription(channel, observer) {
    const subscription = this.subscriptions.find(s => s.channel === channel);
    this.echo.leave(channel);
    observer.complete();
    this.subscriptions = this.subscriptions.slice(this.subscriptions.indexOf(subscription), 1);
  }
}

export default EchoLink;
