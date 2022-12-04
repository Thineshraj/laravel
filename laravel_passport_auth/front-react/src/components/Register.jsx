import React from 'react';
import { Link } from 'react-router-dom';

function Register() {
  return (
    <>
      <div className='row mt-5'>
        <div className='bg-light col-lg-4 offset-lg-4 p-5'>
          <h3 className='text-center'>Register Account</h3>

          <form>
            <div class='mb-3'>
              <label for='exampleInputText' class='form-label'>
                User Name
              </label>
              <input
                type='text'
                class='form-control'
                aria-describedby='emailHelp'
              />
            </div>
            <div class='mb-3'>
              <label for='exampleInputEmail1' class='form-label'>
                Email address
              </label>
              <input
                type='email'
                class='form-control'
                aria-describedby='emailHelp'
              />
            </div>
            <div class='mb-3'>
              <label for='exampleInputPassword1' class='form-label'>
                Password
              </label>
              <input type='password' class='form-control' />
            </div>
            <div class='mb-3'>
              <label for='exampleInputPassword1' class='form-label'>
                Confirm Password
              </label>
              <input type='password' class='form-control' />
            </div>
            <button type='submit' class='btn btn-primary col-12 mb-3'>
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
