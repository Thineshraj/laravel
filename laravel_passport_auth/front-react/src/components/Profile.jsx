import React from 'react';
import { Redirect } from 'react-router-dom';

function Profile(props) {
  // If no token is in the localStorage, redirect the '/profile' to '/login'
  if (!localStorage.getItem('token')) {
    return <Redirect to='/login' />;
  }

  return (
    <>
      <div className='row mt-5'>
        <div className='bg-light col-lg-4 offset-lg-4 p-5'>
          <h3 className='text-center'>User Profile</h3>

          <ul className='list-group'>
            <li className='list-group-item'>Name: {props.user.name}</li>
            <li className='list-group-item'>Email: {props.user.email}</li>
          </ul>
        </div>
      </div>
    </>
  );
}

export default Profile;
