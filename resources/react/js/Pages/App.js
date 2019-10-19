import React from 'react';
import gql from 'graphql-tag';
import { Query } from 'react-apollo';
import { graphql } from 'react-apollo'
// import './App.css';

const TRIGGER_RANDOM_NUMBER = gql`
    mutation TriggerTestSubscription {
        triggerTestSubscription
    }
`;

export const GET_RANDOM_NUMBER = gql`
    query test {
        test
    }
`;

const RANDOM_NUMBER_SUBSCRIPTION = gql`
    subscription Test {
        test
    }
`;

// function triggerSubscription()
// {
//     alert('ha');
// };

const App = ({ data: { test, loading, error, subscribeToMore } }) => {
      if (error) {
        return null;
      }
      if (loading) {
        return <div>Loading ...</div>;
      }
      console.log('got: '+test);
      return (
        <div>{test}</div>
        // <Button onClick={triggerSubscription} >
        //     Trigger test subscription
        // </Button>
        // <RandomNumber 
        //     subscribeToMore={subscribeToMore}
        // />
      );

class RandomNumber extends React.Component {
    componentDidMount() {
        // this.props.randomNumber = 12;
      this.props.subscribeToMore({
        document: RANDOM_NUMBER_SUBSCRIPTION,
        updateQuery: ({ subscriptionData }) => {
          return {
            randomNumber: subscriptionData.test,
          };
        },
      });
    }
  
    render() {
      return (
        <div>
          {this.props.randomNumber}
        </div>
      );
    }
}
};

export default graphql(GET_RANDOM_NUMBER)(App)
