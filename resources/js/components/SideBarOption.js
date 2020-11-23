import React from 'react'
import '../../css/SideBarOption.css'
import { Link } from 'react-router-dom';

function SideBarOption({Icon, title, url}) {
  return (
    <Link to={url} className="sidebaroption__link">
      <div className="sidebaroption__container">
        <Icon className="sidebarOption__icon" />
        <h4 className="sidebaroption__title">{title}</h4>
      </div>
    </Link>
  )
}

export default SideBarOption
