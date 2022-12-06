import React, { useEffect, useState } from 'react';
import axios from 'axios';

import Header from './common/Header';

function App() {
  const [user, setUser] = useState({});

  useEffect(() => {
    axios
      .get('/user')
      .then((response) => {
        setUserMethod(response.data);
      })
      .catch((error) => {
        // console.log(error);
      });
  }, []);

  const setUserMethod = (userData) => {
    setUser(userData);
  };
  return (
    <>
      <Header user={user} setUserProp={setUserMethod} />
    </>
  );
}

export default App;
