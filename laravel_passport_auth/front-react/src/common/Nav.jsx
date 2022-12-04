import React from 'react';

import { Link } from 'react-router-dom';

function Nav() {
  return (
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
      <div class='container-fluid'>
        <Link class='navbar-brand' to='/'>
          Authentication
        </Link>
        <button
          class='navbar-toggler'
          type='button'
          data-bs-toggle='collapse'
          data-bs-target='#navbarText'
          aria-controls='navbarText'
          aria-expanded='false'
          aria-label='Toggle navigation'
        >
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarText'>
          <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
            <li class='nav-item'>
              <Link class='nav-link active' to='/'>
                Home
              </Link>
            </li>
            <li class='nav-item'>
              <Link class='nav-link' to='/profile'>
                Profile
              </Link>
            </li>
          </ul>
          <span class='navbar-text'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
              <li class='nav-item'>
                <Link class='nav-link' to='/login'>
                  Login
                </Link>
              </li>
              <li class='nav-item'>
                <Link class='nav-link' to='/register'>
                  Register
                </Link>
              </li>
            </ul>
          </span>
        </div>
      </div>
    </nav>
  );
}

export default Nav;
