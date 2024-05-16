import './App.css'

function App() {
  const login = async () => {
    try {
      await fetch('https://take-cantik.local/api/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          email: 'ahiahi@example.com',
          password: 'password',
        }),
        credentials: 'include',
      })
    } catch (error) {
      console.error(error)
    }
  }


  const checkAuth = async () => {
    try {
      await fetch('https://take-cantik.local/api/verify-auth', {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
        },
        credentials: 'include',
      })
    } catch (error) {
      console.error(error)
    }
  }

  const healthCheck = async () => {
    try {
      await fetch('https://take-cantik.local/api/health-check', {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
        },
        credentials: 'include',
      })
    } catch (error) {
      console.error(error)
    }
  }

  return (
    <>
      <div>
        <button onClick={login} className="button">login</button>
        <button onClick={checkAuth} className="button">check auth</button>
        <button onClick={healthCheck} className="button">health check</button>
      </div>
    </>
  )
}

export default App
