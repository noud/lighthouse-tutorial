import React from 'react'
import Layout from '../Shared/Layout'

export default function Contact(props) {
  return (
    <Layout>
      <h1>Contact</h1>
      <p>This is the contact page</p>
      <p>{props.foo}</p>
    </Layout>
  )
}