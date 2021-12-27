import React from 'react';
import {Form, Col, Row} from 'react-bootstrap';
export default function Formulario(props){
    return (
        <Form>
  <Form.Group as={Row} controlId="Direccion">
    <Form.Label column sm="2">
      Dirección
    </Form.Label>
    <Col sm="10">
      <Form.Control type="text" placeholder="Carrera" />
    </Col>
  </Form.Group>
  <Form.Group as={Row} controlId="carrera.id">
    <Form.Label column sm="2">
      Carrera
    </Form.Label>
    <Col sm="10">
      <Form.Control type="text" placeholder="Carrera" />
    </Col>
  </Form.Group>
  <Form.Group as={Row} controlId="Abreviatura">
    <Form.Label column sm="2">
      Abreviatura
    </Form.Label>
    <Col sm="10">
      <Form.Control type="text" placeholder="Abreviatura" />
    </Col>
  </Form.Group>
</Form>
    );
}