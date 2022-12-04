import React from 'react';
import { Link } from 'react-router-dom';

function Register() {
  return (
    <>
      <div className='row mt-5'>
        <div className='bg-light col-lg-4 offset-lg-4 p-5'>
          <h3 className='text-center'>Register Account</h3>

          <form>
            <div className='mb-3'>
              <label htmlFor='exampleInputText' className='form-label'>
                User Name
              </label>
              <input
                type='text'
                className='form-control'
                aria-describedby='emailHelp'
              />
            </div>
            <div className='mb-3'>
              <label htmlFor='exampleInputEmail1' className='form-label'>
                Email address
              </label>
              <input
                type='email'
                className='form-control'
                aria-describedby='emailHelp'
              />
            </div>
            <div className='mb-3'>
              <label htmlFor='exampleInputPassword1' className='form-label'>
                Password
              </label>
              <input type='password' className='form-control' />
            </div>
            <div className='mb-3'>
              <label htmlFor='exampleInputPassword1' className='form-label'>
                Confirm Password
              </label>
              <input type='password' className='form-control' />
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
