import React from 'react';
import { Link } from 'react-router-dom';

function Login() {
  return (
    <>
      <div className='row mt-5'>
        <div className='bg-light col-lg-4 offset-lg-4 p-5'>
          <h3 className='text-center'>Login Account</h3>

          <form>
            <div class='mb-3'>
              <label for='exampleInputEmail1' class='form-label'>
                Email address
              </label>
              <input
                type='email'
                class='form-control'
                id='exampleInputEmail1'
                aria-describedby='emailHelp'
              />
            </div>
            <div class='mb-3'>
              <label for='exampleInputPassword1' class='form-label'>
                Password
              </label>
              <input
                type='password'
                class='form-control'
                id='exampleInputPassword1'
              />
            </div>
            <div class='mb-3 form-check'>
              <input
                type='checkbox'
                class='form-check-input'
                id='exampleCheck1'
              />
              <label class='form-check-label' for='exampleCheck1'>
                Check me out
              </label>
            </div>
            <button type='submit' class='btn btn-primary col-12 mb-3'>
              Login
            </button>
            Forget my password <Link to='forget'>Click here</Link>
          </form>
        </div>
      </div>
    </>
  );
}

export default Login;
