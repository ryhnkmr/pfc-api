import React from 'react';
import '../../css/SideBar.css';
import SideBarOption from './SideBarOption';
import DashboardIcon from '@material-ui/icons/Dashboard';
import PeopleAltIcon from '@material-ui/icons/PeopleAlt';
import MailIcon from '@material-ui/icons/Mail';

function SideBar() {
  return (
    <div className="sidebar">
      <div className="sidebar__header">
        <h2 className="sidebar__title">PFC Admin</h2>
        <hr />
      </div>
      <div className="sidebar__body">
        <SideBarOption Icon={DashboardIcon} title="DashBoard" url='/' />
        <SideBarOption Icon={PeopleAltIcon} title="Users" url="/user" />
        <SideBarOption Icon={MailIcon} title="Requests" url="/requests" />
      </div>
    </div>
  )
}

export default SideBar
