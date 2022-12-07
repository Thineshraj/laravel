import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

function ForgetPass() {
  const [email, setEmail] = useState('');

  const formSubmitHandler = (e) => {
    e.preventDefault();
    const data = {
      email,
    };

    axios
      .post('/forgotpassword', data)
      .then((response) => {
        console.log(response);
      })
      .catch((error) => {
        console.error(error);
      });
  };
  return (
    <>
      <div className='row mt-5'>
        <div className='bg-light col-lg-4 offset-lg-4 p-5'>
          <h3 className='text-center'>Forget Password</h3>

          <form onSubmit={formSubmitHandler}>
            <div className='mb-3'>
              <label htmlFor='exampleInputEmail1' className='form-label'>
                Email address
              </label>
              <input
                type='email'
                className='form-control'
                name='email'
                aria-describedby='emailHelp'
                onChange={(e) => setEmail(e.target.value)}
              />
            </div>
            <button type='submit' className='btn btn-primary col-12 mb-3'>
              Submit
            </button>
            Back to Login page <Link to='login'>Click here</Link>
          </form>
        </div>
      </div>
    </>
  );
}

export default ForgetPass;
