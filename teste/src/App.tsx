import { ToastContainer } from "react-toastify";
import { Home } from "./app/pages/Home";
import 'react-toastify/dist/ReactToastify.min.css'

function App() {
  return (
    <div>
      <Home />
      <ToastContainer />
    </div>
  );
}

export default App;
