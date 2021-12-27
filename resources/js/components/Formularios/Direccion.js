import React from 'react';
import {Form, Button} from 'react-bootstrap';

export default function Direccion(props) {  
    return (
        <Form>
            <Form.Group controlId="direccion">
                <Form.Label>Dirección</Form.Label>
                <Form.Control type="text" placeholder="Dirección" />
                <Form.Text className="text-muted">
                    Escribe la dirección completa 
                </Form.Text>
            </Form.Group>
            <Form.Group controlId="abreviatura">
                <Form.Label>Abreviatura</Form.Label>
                <Form.Control type="text" placeholder="Abreviatura" />
                <Form.Text className="text-muted">
                    Escribe la abreviatura de la dirección
                </Form.Text>
            </Form.Group>
            <Button variant="primary" type="submit">enviar</Button>
        </Form>
    );
}