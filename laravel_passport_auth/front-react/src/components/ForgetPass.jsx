import React from 'react';
import { Link } from 'react-router-dom';

function ForgetPass() {
  return (
    <>
      <div className='row mt-5'>
        <div className='bg-light col-lg-4 offset-lg-4 p-5'>
          <h3 className='text-center'>Forget Password</h3>

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
            <button type='submit' class='btn btn-primary col-12 mb-3'>
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
