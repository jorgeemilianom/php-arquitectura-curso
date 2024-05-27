import axios from 'axios';

export default function Home() {

  const handleSubmit = (e) => {
    e.preventDefault()
    axios.get('http://api.empremarket.local/products')
    // axios.get('http://jorge.gesprender.local/api/index.php/users/get-all')
    .then(response => {
      // Manejar la respuesta
      console.log(response.data);
    })
    .catch(error => {
      // Manejar el error
      console.error('Error al obtener datos:', error);
    });
  }

  return (
    <form className="form-floating text-dark mt-4 pt-4" onSubmit={handleSubmit}>
      <div className="form-floating mb-3">
        <input type="email" className="form-control" id="floatingInput" placeholder="name@example.com" />
        <label htmlFor="floatingInput">Email address</label>
      </div>
      <div className="form-floating">
        <input type="password" className="form-control" id="floatingPassword" placeholder="Password" />
        <label htmlFor="floatingPassword">Password</label>
      </div>

      <button className="btn btn-primary mt-4" type="submit">
        enviar
      </button>
    </form>
  )
}
