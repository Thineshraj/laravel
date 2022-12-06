import React, { useState } from 'react';
import { Link, Redirect } from 'react-router-dom';
import axios from 'axios';

function Register(props) {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [password_confirmation, setPassword_confirmation] = useState('');
  // const [message, setMessage] = useState('');
  const [loggedIn, setLoggedIn] = useState(false);

  const formSubmit = (e) => {
    e.preventDefault();

    const data = {
      name,
      email,
      password,
      password_confirmation,
    };

    axios
      .post('/register', data)
      .then((response) => {
        localStorage.setItem('token', response.data.token);
        setLoggedIn(true);
        props.setUserProp(response.data.user);
      })
      .catch((error) => {
        console.log(error);
      });
  };

  // After Register redirect to Profile page
  if (loggedIn) {
    return <Redirect to='/profile' />;
  }

  return (
    <>
      <div className='row mt-5'>
        <div className='bg-light col-lg-4 offset-lg-4 p-5'>
          <h3 className='text-center'>Register Account</h3>

          <form onSubmit={formSubmit}>
            <div className='mb-3'>
              <label htmlFor='exampleInputText' className='form-label'>
                User Name
              </label>
              <input
                type='text'
                name='name'
                required
                className='form-control'
                aria-describedby='emailHelp'
                onChange={(e) => setName(e.target.value)}
              />
            </div>
            <div className='mb-3'>
              <label htmlFor='exampleInputEmail1' className='form-label'>
                Email address
              </label>
              <input
                type='email'
                name='email'
                required
                className='form-control'
                aria-describedby='emailHelp'
                onChange={(e) => setEmail(e.target.value)}
              />
            </div>
            <div className='mb-3'>
              <label htmlFor='exampleInputPassword1' className='form-label'>
                Password
              </label>
              <input
                type='password'
                name='password'
                required
                className='form-control'
                onChange={(e) => setPassword(e.target.value)}
              />
            </div>
            <div className='mb-3'>
              <label htmlFor='exampleInputPassword1' className='form-label'>
                Confirm Password
              </label>
              <input
                type='password'
                name='password_confirmation'
                required
                className='form-control'
                onChange={(e) => setPassword_confirmation(e.target.value)}
              />
            </div>
            <button type='submit' className='btn btn-primary col-12 mb-3'>
              Register
            </button>
            Have an Account? <Link to='login'>Login</Link>
          </form>
        </div>
      </div>
    </>
  );
}

export default Register;
