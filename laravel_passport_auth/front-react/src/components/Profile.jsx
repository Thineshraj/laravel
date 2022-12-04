import React from 'react';
import { Link } from 'react-router-dom';

function Profile() {
  return (
    <>
      <div className='row mt-5'>
        <div className='bg-light col-lg-4 offset-lg-4 p-5'>
          <h3 className='text-center'>User Profile</h3>

          <ul class='list-group'>
            <li class='list-group-item'>Name: example</li>
            <li class='list-group-item'>Email: example@gmail.com</li>
          </ul>
        </div>
      </div>
    </>
  );
}

export default Profile;
