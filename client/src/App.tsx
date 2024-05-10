import './App.css'

function App() {
  const signUp = async () => {
    try {
      await fetch('https://take-cantik.local/api/signup', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          email: 'ahiahi@example.com',
          password: 'password',
        }),
      })
    } catch (error) {
        console.error(error)
    }
  }

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
      })
    } catch (error) {
      console.error(error)
    }
  }

  return (
    <>
      <div>
        <button onClick={signUp} className="button">sign up</button>
        <button onClick={login} className="button">login</button>
        <button onClick={checkAuth} className="button">check auth</button>
      </div>
    </>
  )
}

export default App
