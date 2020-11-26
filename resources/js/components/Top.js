import React, { useEffect, useState } from 'react';
import {Line} from 'react-chartjs-2';
import '../../css/Top.css';
import axios from 'axios';
import PeopleAltIcon from '@material-ui/icons/PeopleAlt';
import DashBoardCard from './DashBoardCard';

function Top() {
    const [dataFrom, setData] = useState([])
    const [labels, setLabels] = useState([])
    const [activeUsersCount, setActiveUserCount] = useState()
    const [newUsersCount, setNewUserCount] = useState()

    useEffect(()=> {
      getData();
    }, [])

    const getData = async () => {
        const response = await axios.get('api/dashboard');
        setData(response.data.data);
        setLabels(response.data.labels);
        setActiveUserCount(response.data.active_users)
        setNewUserCount(response.data.new_users)
    }


    const data = {
        labels: labels,
        datasets: [
          {
            label: 'User',
            fill: false,
            lineTension: 0.1,
            backgroundColor: 'rgba(75,192,192,0.4)',
            borderColor: 'rgba(75,192,192,1)',
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: 'rgba(75,192,192,1)',
            pointBackgroundColor: '#fff',
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: 'rgba(75,192,192,1)',
            pointHoverBorderColor: 'rgba(220,220,220,1)',
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: dataFrom
          }
        ]
      };
    
    return (
      <div>
        <div className='chart__wrapper'>
          <h2>Access Amount</h2>
          <Line data={data} width={100} height={50} />
        </div>
        <div className="card_wrapper">
          <DashBoardCard Icon={ PeopleAltIcon } cardTitle="new user" count={newUsersCount} />
          <DashBoardCard Icon={ PeopleAltIcon } cardTitle="active user" count={activeUsersCount} />
        </div>        
      </div>
    );
}

export default Top;