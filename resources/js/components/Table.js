import React from 'react'

function Table(users) {
  return (
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
  )
}

export default Table
