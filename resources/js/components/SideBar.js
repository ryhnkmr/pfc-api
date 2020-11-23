import React from 'react';
import '../../css/SideBar.css';
import SideBarOption from './SideBarOption';


import DashboardIcon from '@material-ui/icons/Dashboard';
import PeopleAltIcon from '@material-ui/icons/PeopleAlt';

function SideBar() {
  return (
    <div className="sidebar">
      <div className="sidebar__header">
        <h2 className="sidebar__title">PFC Admin</h2>
        <hr />
      </div>
      <div className="sidebar__body">
        <SideBarOption Icon={DashboardIcon} title="DashBoard" url='/top' />
        <SideBarOption Icon={PeopleAltIcon} title="Users" url="/user" />
      </div>
    </div>
  )
}

export default SideBar
