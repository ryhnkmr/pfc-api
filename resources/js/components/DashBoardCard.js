import React from 'react'
import '../../css/DashBoardCard.css'

function DashBoardCard({Icon, cardTitle, ratio}) {
  return (
    <div>
      <div className="box">
        <div className="box-top">
          <span>{ratio}<span className="ratio">%</span></span>
        </div> 
        <div className="box-info">
          <span>{cardTitle}</span>
        </div>
        <div className="box-bottom">
          <Icon className="icon"/>
        </div>
      </div> 
    </div>
  )
}

export default DashBoardCard
