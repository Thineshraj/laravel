import React, { useState } from 'react';
import { Link, Redirect } from 'react-router-dom';
import axios from 'axios';

function Login(props) {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  // const [message, setMessage] = useState('');
  const [loggedIn, setLoggedIn] = useState(false);

  const FormSubmit = (e) => {
    e.preventDefault();
    const data = {
      email,
      password,
    };

    axios
      .post('/login', data)
      .then((response) => {
        localStorage.setItem('token', response.data.token);
        setLoggedIn(true);
        console.log(loggedIn);
        props.setUserProp(response.data.user);
      })
      .catch((error) => {
        console.log(error);
      });
  };

  if (loggedIn) {
    return <Redirect to='/profile' />;
  }

  return (
    <>
      <div className='row mt-5'>
        <div className='bg-light col-lg-4 offset-lg-4 p-5'>
          <h3 className='text-center'>Login Account</h3>

          <form onSubmit={FormSubmit}>
            <div className='mb-3'>
              <label htmlFor='exampleInputEmail1' className='form-label'>
                Email address
              </label>
              <input
                type='email'
                name='email'
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
                className='form-control'
                onChange={(e) => setPassword(e.target.value)}
              />
            </div>
            <div className='mb-3 form-check'>
              <input
                type='checkbox'
                className='form-check-input'
                id='exampleCheck1'
              />
              <label className='form-check-label' htmlFor='exampleCheck1'>
                Check me out
              </label>
            </div>
            <button type='submit' className='btn btn-primary col-12 mb-3'>
              Login
            </button>
            Forget my password <Link to='forget'>Click here</Link>
            <br />
            Don't have Account? <Link to='register'>Register</Link>
          </form>
        </div>
      </div>
    </>
  );
}

export default Login;
