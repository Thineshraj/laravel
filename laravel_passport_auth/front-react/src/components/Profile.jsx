import React from 'react';
import { Link } from 'react-router-dom';

function Profile(props) {
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
