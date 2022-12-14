import React, { useState } from 'react';

import { Link } from 'react-router-dom';

function Nav(props) {
  let actionBtn, navMenu;

  const logoutHandler = () => {
    localStorage.clear();
    props.setUserProp(null);
  };

  if (localStorage.getItem('token')) {
    actionBtn = (
      <li className='nav-item'>
        <Link className='nav-link' to='/' onClick={logoutHandler}>
          Logout
        </Link>
      </li>
    );

    navMenu = (
      <li className='nav-item'>
        <Link className='nav-link' to='/profile'>
          Profile
        </Link>
      </li>
    );
  }

  return (
    <nav className='navbar navbar-expand-lg navbar-dark bg-dark'>
      <div className='container-fluid'>
        <Link className='navbar-brand' to='/'>
          Authentication
        </Link>
        <button
          className='navbar-toggler'
          type='button'
          data-bs-toggle='collapse'
          data-bs-target='#navbarText'
          aria-controls='navbarText'
          aria-expanded='false'
          aria-label='Toggle navigation'
        >
          <span className='navbar-toggler-icon'></span>
        </button>
        <div className='collapse navbar-collapse' id='navbarText'>
          <ul className='navbar-nav me-auto mb-2 mb-lg-0'>
            <li className='nav-item'>
              <Link className='nav-link' to='/'>
                Home
              </Link>
            </li>
            {navMenu && (
              <li className='nav-item'>
                <Link className='nav-link' to='/profile'>
                  Profile
                </Link>
              </li>
            )}
          </ul>
          <span className='navbar-text'>
            <ul className='navbar-nav me-auto mb-2 mb-lg-0'>
              {actionBtn ? (
                actionBtn
              ) : (
                <>
                  <li className='nav-item'>
                    <Link className='nav-link' to='/login'>
                      Login
                    </Link>
                  </li>
                  <li className='nav-item'>
                    <Link className='nav-link' to='/register'>
                      Register
                    </Link>
                  </li>
                </>
              )}
            </ul>
          </span>
        </div>
      </div>
    </nav>
  );
}

export default Nav;
