import React, { useState } from 'react';
import { Redirect } from 'react-router-dom';
import axios from 'axios';

function ResetPass() {
  const [email, setEmail] = useState('');
  const [token, setToken] = useState('');
  const [password, setPassword] = useState('');
  const [password_confirmation, setPassword_confirmation] = useState('');
  const [isReset, setIsReset] = useState(false);
  const [message, setMessage] = useState('');

  const formSubmit = (e) => {
    e.preventDefault();
    const data = {
      email,
      token,
      password,
      password_confirmation,
    };

    axios
      .post('/resetpassword', data)
      .then((response) => {
        setMessage(response.data.message);
        setIsReset(true);
      })
      .catch((error) => {
        setMessage(error.data.message);
      });
  };

  if (isReset) {
    return <Redirect to='/login' />;
  }

  let error = '';
  if (message) {
    error = (
      <div className='alert alert-danger' role='alert'>
        {message}
      </div>
    );
  }

  return (
    <>
      <div className='row mt-5'>
        <div className='bg-light col-lg-4 offset-lg-4 p-5'>
          <h3 className='text-center'>Reset Password</h3>
          {error}
          <form onSubmit={formSubmit}>
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
              <label htmlFor='exampleInputText' className='form-label'>
                Pin Code
              </label>
              <input
                type='text'
                name='token'
                required
                className='form-control'
                onChange={(e) => setToken(e.target.value)}
              />
            </div>
            <div className='mb-3'>
              <label htmlFor='exampleInputPassword1' className='form-label'>
                New Password
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
              Reset
            </button>
          </form>
        </div>
      </div>
    </>
  );
}

export default ResetPass;
