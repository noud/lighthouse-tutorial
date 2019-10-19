import { InertiaLink } from '@inertiajs/inertia-react'
import React from 'react'

export default function Layout({ children }) {
  return (
    <main>
      <header>
        <InertiaLink href="/test-react">Home</InertiaLink>
        <InertiaLink href="/test-react/about">About</InertiaLink>
        <InertiaLink href="/test-react/contact">Contact</InertiaLink>
        <InertiaLink href="/test-react/subscription">Subscription</InertiaLink>
      </header>

      <article>{children}</article>
    </main>
  )
}