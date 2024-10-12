import React from 'react';
import FilmList from './components/FilmList';
import ScreeningList from './components/ScreeningList';
import Container from '@mui/material/Container';
import { BrowserRouter as Router, Routes, Route, useParams } from 'react-router-dom';
import { fetchFilms } from './helpers/api';

function App() {
  const ScreeningListWrapper = () => {
    const { filmId } = useParams();
    const [selectedFilm, setSelectedFilm] = React.useState(null);

    React.useEffect(() => {
      const fetchFilm = async () => {
        const films = await fetchFilms();
        const film = films.find((film) => film.id === parseInt(filmId, 10));
        setSelectedFilm(film);
      };
      fetchFilm();
    }, [filmId]);

    if (!selectedFilm) {
      return <div>Loading...</div>;
    }

    return <ScreeningList film={selectedFilm} />;
  };

  return (
    <Router>
      <Container maxWidth={false} style={{ minHeight: '100vh', display: 'flex', justifyContent: 'center', alignItems: 'center', backgroundColor: '#212121' }}>
        <Routes>
          <Route path="/" element={<FilmList />} />
          <Route path="/screenings/:filmId" element={<ScreeningListWrapper />} />
        </Routes>
      </Container>
    </Router>
  );
}

export default App;
