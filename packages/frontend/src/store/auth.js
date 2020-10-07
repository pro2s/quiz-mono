import axios from '../axios'
import { reactive, readonly } from 'vue';

export const authSymbol = Symbol('auth-store')

export const createStore = () => {
  const state = reactive({
    authenticated: false,
    user: null
  });

  const logoutUser = () =>  {
    authenticated(false)
    user(null)
  }

  const user = (user) => state.user = user;

  const authenticated = (authenticated) => state.authenticated = authenticated;

  const logout = async () => {
    await axios.post('/logout')

    logoutUser()
  }

  const udpateUser = () => {
    return axios.get('/api/user').then((response) => {
      authenticated(true)
      user(response.data)
    }).catch(() => logoutUser())
  }

  const signIn = async (credentials) => {
    await axios.get('/sanctum/csrf-cookie')
    await axios.post('/login', credentials)

    return udpateUser()
  }

  return { udpateUser, signIn, logout, state: readonly(state) };
}
