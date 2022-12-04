import Nav from './Nav';
import Home from '../components/Home';

import { BrowserRouter as Router, Switch, Route, Link } from 'react-router-dom';

const Header = () => {
  return (
    <>
      <Router>
        <Nav />

        <Switch>
          <Route exact path='/' component={Home} />
        </Switch>
      </Router>
    </>
  );
};

export default Header;
