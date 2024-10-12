import React, { useEffect, useState } from 'react';
import PropTypes from 'prop-types';
import { fetchFilms } from '../helpers/api';
import { colors } from '@mui/material';
import { useNavigate } from 'react-router-dom';

const FilmList = ({ onFilmSelect }) => {
  const [films, setFilms] = useState([]);
  const navigate = useNavigate();

  useEffect(() => {
    const getFilms = async () => {
      const data = await fetchFilms();
      if (data) {
        setFilms(data);
      }
    };
    getFilms();
  }, []);

  const colorPalette = [
    colors.blue[100],
    colors.red[100],
    colors.green[100],
    colors.purple[100],
    colors.orange[100],
    colors.pink[100],
    colors.teal[100],
    colors.indigo[100],
    colors.amber[100],
    colors.cyan[100],
  ];

  const handleFilmClick = (film) => {
    if (onFilmSelect) {
      onFilmSelect(film);
    } else {
      navigate(`/screenings/${film.id}`);
    }
  };

  return (
    <div className="p-4 w-full min-h-screen" style={{ backgroundColor: colors.grey[900] }}>
      <div className="w-full max-w-7xl mx-auto px-4">
        <h1 className="text-3xl font-bold mb-6 text-center text-white">Available Films</h1>
        <ul className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
          {films.map((film, index) => (
            <li key={film.id} className="bg-white shadow-md rounded-lg p-6 cursor-pointer" onClick={() => handleFilmClick(film)}>
              <div className="w-full h-64 rounded-md mb-4 flex items-center justify-center" style={{ backgroundColor: colorPalette[index % colorPalette.length] }}>
                <h2 className="text-2xl font-semibold text-gray-800 text-center px-4">{film.title}</h2>
              </div>
              <p className="text-gray-700 mb-2 text-justify px-4">{film.description}</p>
              <p className="text-sm text-gray-500 text-center"><strong>Rating:</strong> {film.rating}</p>
              <p className="text-sm text-gray-500 text-center"><strong>Language:</strong> {film.language}</p>
            </li>
          ))}
        </ul>
      </div>
    </div>
  );
};

FilmList.propTypes = {
  onFilmSelect: PropTypes.func,
};

export default FilmList;
