import React from 'react';
import {Navbar, Nav, Form, FormControl, Button} from 'react-bootstrap';

export default function Menu(props) {
    return (
        <Navbar bg="dark" variant="dark">
            <Navbar.Brand href="#home">UTVT</Navbar.Brand>
                <Nav className="mr-auto">
                <Nav.Link href="#home">Dirección</Nav.Link>
                <Nav.Link href="#features">Carreras</Nav.Link>
                <Nav.Link href="#pricing">Pricing</Nav.Link>
            </Nav>
            <Form inline>
                <FormControl type="text" placeholder="Search" className="mr-sm-2" />
                <Button variant="outline-info">Search</Button>
            </Form>
        </Navbar>
    );
}
