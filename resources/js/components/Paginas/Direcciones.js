import React from 'react';
import {Card, Table} from 'react-bootstrap';
 import useFetch from '../../hooks/useFetch'; //regresar a una carpeta superior

 const url = 'http://localhost:3000/api/direcciones';
 const opt = {};
 const token = 'Q7TI4u1MmzF66Bdf0tWfst69yWejeFmnLk31F5f369c3vqRqibSVPKXzTh9w';

export default function Direcciones(props){
     const res = useFetch(url,opt, token);
    return (
        <Card>
         <Card.Header>Direcciones</Card.Header>
            <Card.Body>
                <Card.Title>Direcciones</Card.Title>
                    
                    <Table striped bordered hover variant="dark">
  <thead>
    <tr>
      <th style={{width:'25%'}}>Direccion</th> 
      <th style={{width:'25%'}}>Abreviatura</th>
      <th style={{width:'25%'}}>Estatus</th>
      <th style={{width:'25%'}}>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    {renglones(res)}
</tbody>
</Table>
                    
                 
             </Card.Body>
        </Card>
    );
}

function renglones(res){
     if (res.loading || null == res.result){
         return <tr><td colSpan="4"><strong>Cargando...</strong></td></tr> //es un fragmento que parece HTML 
     }
     return res.result.data.map((r) =>(
         <tr>
             <td>{r.direccion}</td>
             <td>{r.abreviatura}</td>
             <td>{r.estatus}</td>
             <td>&nbsp;</td>
         </tr>
     ));
 }