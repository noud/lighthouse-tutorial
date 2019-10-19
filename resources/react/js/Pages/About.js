import React from 'react'
import Layout from '../Shared/Layout'

export default function About(props) {
  return (
    <Layout>
      <h1>About</h1>
      <p>This is the about page</p>
      <p>{props.foo}</p>
    </Layout>
  )
}