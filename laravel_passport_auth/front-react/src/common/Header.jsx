import Nav from './Nav';
import Home from '../components/Home';
import Profile from '../components/Profile';
import Login from '../components/Login';
import Register from '../components/Register';
import ForgetPass from '../components/ForgetPass';

import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';

const Header = (props) => {
  return (
    <>
      <Router>
        <Nav setUserProp={props.setUserProp} />

        <Switch>
          <Route exact path='/' component={Home} />
          <Route
            path='/profile'
            component={() => <Profile user={props.user} />}
          />
          <Route path='/login' component={Login} />
          <Route path='/register' component={Register} />
          <Route path='/forget' component={ForgetPass} />
        </Switch>
      </Router>
    </>
  );
};

export default Header;
