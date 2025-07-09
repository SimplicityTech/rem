import React from 'react';
import './HomePage.css';

export default function HomePage() {
  return (
    <>
      <header className="hero">
        <h1>Welcome to REM</h1>
        <p>Real Estate Market — A New Era of Connected Real Estate</p>
      </header>

      <section className="section" id="mission">
        <h2>Our Mission</h2>
        <p>
          REM is building South Africa’s smartest real estate ecosystem —
          connecting buyers, sellers, mortgage providers, and developers through
          data, design, and trust. We believe in a market where everyone wins.
        </p>
      </section>

      <section className="section" id="ecosystem">
        <h2>The REM Ecosystem</h2>
        <div className="pillars">
          {[
            { title: 'Buyers', text: 'Create wishlists and get matched with your dream home.' },
            { title: 'Sellers', text: 'List properties with insights into live buyer demand.' },
            { title: 'Mortgage Providers', text: 'Pre-approve the right buyers at the right time, automatically.' },
            { title: 'Developers', text: 'Build based on real data and market signals.' },
          ].map((item) => (
            <div className="pillar" key={item.title}>
              <h3>{item.title}</h3>
              <p>{item.text}</p>
            </div>
          ))}
        </div>
      </section>

      <section className="cta">
        <h2>Join the Revolution</h2>
        <p>Be part of South Africa’s most powerful real estate movement.</p>
        <a href="#signup">Request Early Access</a>
      </section>

      <footer className="footer">
        © 2025 REM – Real Estate Market. A brand of Home Market (Pty) Ltd.
      </footer>
    </>
  );
}