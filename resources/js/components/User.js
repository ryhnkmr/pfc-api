import React, { useEffect, useState } from 'react';
import axios from 'axios';
import '../../css/User.css'
function User() {

    const [users, setUsers] = useState([]);
    let filtered_users = [];

    useEffect(() => {
        getUsers();
    },[])

    const getUsers = async () => {
        const response = await axios.get('/api/user');
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


    return (
      <div className="user_info">
        <h1>Userページ</h1>
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
            <th>id</th>
            <th>uid</th>
            <th>email</th>
            <th>Last Loginned At</th>
            <th>Created At</th>
          </tr>
            {
              users.map(
                (user) => 
                <tr>
                  <td>{user.id}</td>
                  <td>{user.name}</td>
                  <td>test@test.com</td>
                  <td>2020-12-23</td>
                  <td>2020-10-22</td>
                </tr>
              )
            }
          
        </table>
      </div>
    );
}

export default User;