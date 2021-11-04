import React from "react";
import { Container, Navbar,Nav } from "react-bootstrap";
const Navi = () => {
    return (
        <Navbar bg="dark" variant="dark">
            <Container>
                <Navbar.Brand href="/topicos/public/">Navbar</Navbar.Brand>
                <Nav className="me-auto">
                    <Nav.Link href="/topicos/public/Home">Home</Nav.Link>
                    <Nav.Link href="/topicos/public/LoginForm">Login</Nav.Link>
                </Nav>
            </Container>
        </Navbar>
    );
};
export default Navi;
