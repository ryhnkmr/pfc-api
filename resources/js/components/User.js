import React, { useEffect, useState } from 'react';
import axios from 'axios';
import '../../css/User.css'
import EditIcon from '@material-ui/icons/Edit';
import DeleteIcon from '@material-ui/icons/Delete';
import {Link} from 'react-router-dom'
import { Alarm } from '@material-ui/icons';
import { keys } from 'lodash';

function User() {

    const [users, setUsers] = useState([]);
    let filtered_users = [];

    useEffect(() => {
        getUsers();
    },[])

    const getUsers = async () => {
        const response = await axios.get('/api/user');
        console.log(response.data.users);
        setUsers(response.data.users);
    }

    const filterByInput = (value) => {
      getUsers();
      // フォームの入力が空になったときの制御
      if (!value) {
        filtered_users = users;
      } else {
        filtered_users = users.filter(user=>{
          //return any product whose name or designer contains the input box string
          return user.name.toLowerCase().includes(value);
        })
      }
      setUsers(filtered_users);
    }

    const confirm = async (userId) => {
      let res = window.confirm('Are you sure?');
      console.log('/api/user/'+userId)
      if( res == true ) {
        // apiでsoft delete
        const response = await axios.delete('/api/user/'+userId);
        alert(response.data.message);
        getUsers(); 
      } else {
        return alert('delete was cancleled')
      }
    }

    const test = (userId) => {
      console.log(userId);
      alert(userId);
    }

    return (
      <div className="user_info">
        <h1>User一覧</h1>
        <div className="field is-grouped" style={{alignItems: "center"}}>
          <div className="control">
            <div className="select">
              <select>
                <option value="" disabled selected>Sort by</option>
                <option>Price - Lowest to Highest</option>
                <option>Price - Highest to Lowest</option>
                <option>Alphabet - A-Z</option>
                <option>Alphabet - Z-A</option>
              </select>
            </div>
          </div>

          <div className='control' style={{minWidth: "300px"}}>
            <input onChange={e=> {
                filterByInput(e.target.value);
              }} style={{width: "100%"}} placeholder='Filter by' type='text'/>
          </div>
        </div>
        <table className="user_table">
          <tr>
            <th width="5%">id</th>
            <th width="10%">uid</th>
            <th width="10%">email</th>
            <th width="10%">Created At</th>
            <th width="10%">Last Loginned At</th>
            <th width="5%"></th>
            <th width="5%"></th>
          </tr>
            {
              users.map(
                (user) => 
                <tr>
                  <td width="5%">{user.id}</td>
                  <td width="10%">{user.name}</td>
                  <td width="10%">test@test.com</td>
                  <td width="10%">2020-12-23</td>
                  <td width="10%">2020-10-22</td>
                  <td width="5%"><button ><EditIcon /></button></td>
                  <td width="5%"><button onClick={()=> confirm(user.id)} key={user.id}><DeleteIcon /></button></td>
                </tr>
              )
            }
          
        </table>
      </div>
    );
}

export default User;