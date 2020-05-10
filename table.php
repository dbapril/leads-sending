<table>
  <thead>
    <tr>
      <th style="min-width: 100px;">Form field</th>
      <th>Data</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>Status: </td>
     <td><?=$this->response->status?></td>
    </tr>
    <tr>
      <td>Message: </td>
      <td><?=$this->response->message?></td>
    </tr>
    <tr>
      <td>Name: </td>
      <td><?=$this->response->data->name?></td>
    </tr>
    <tr>
      <td>Phone: </td>
      <td><?=$this->response->data->phone?></td>
    </tr>
    <tr>
      <td>IP: </td>
      <td><?=$this->response->data->ip?></td>
    </tr>
    <tr>
      <td>Key: </td>
      <td><?=$this->response->key?></td>
    </tr>
  </tbody>
</table>
