import React from 'react'
import { ApolloProvider } from 'react-apollo';
import { apolloClient } from '../apollo';

import App from './App';

export default function Subscription(props) {
  return (
    <ApolloProvider client={apolloClient}>
      <App />
    </ApolloProvider>
  )
}