import "./App.css";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Register from "./Register";
import Login from "./Login";

function App() {
  return (
    <>
      {/* <h1>Hi</h1> */}
      <Router>
        <Routes>
          <Route path="/" element={<Login />} />
          <Route path="/register" element={<Register />} />
          <Route path="*" element={<h1>Not Found </h1>} />
        </Routes>
      </Router>
    </>
  );
}

export default App;
