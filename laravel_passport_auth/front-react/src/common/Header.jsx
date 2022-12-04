import Nav from './Nav';
import Home from '../components/Home';
import Login from '../components/Login';
import Register from '../components/Register';
import ForgetPass from '../components/ForgetPass';

import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';

const Header = () => {
  return (
    <>
      <Router>
        <Nav />

        <Switch>
          <Route exact path='/' component={Home} />
          <Route exact path='/login' component={Login} />
          <Route exact path='/register' component={Register} />
          <Route exact path='/forget' component={ForgetPass} />
        </Switch>
      </Router>
    </>
  );
};

export default Header;
