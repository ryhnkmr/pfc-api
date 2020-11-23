import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import '../../css/App.css'

import About from './About'
import User from './User'
import Top from './Top'
import SideBar from './SideBar';
import MainHeader from './MainHeader';

function App() {
  return (
    <Router>
      <div className="app__body">
        <SideBar />
        <div className="main">
          <MainHeader />
          <div className="main__body">
            <Switch>
              <Route path="/" exact component={Top} />
              <Route path="/user" component={User} />
            </Switch>
          </div>
        </div>
      </div>
    </Router>
  )
}

if (document.getElementById('app')) {
    ReactDOM.render(
      <App/>, document.getElementById('app'));
}