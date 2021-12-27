import React from 'react';
import {Card} from 'react-bootstrap';

export default function Tarjeta(props){
    return (
 <Card>
  <Card.Header>{props.titulo}</Card.Header>
  <Card.Body>
        {props.children}
  </Card.Body>
</Card>
    );
}