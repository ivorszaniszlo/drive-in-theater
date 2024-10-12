// frontend/src/components/FilmList.jsx

import React, { useEffect, useState } from 'react';
import { fetchFilms } from '../helpers/api';

const FilmList = () => {
  const [films, setFilms] = useState([]);

  useEffect(() => {
    const getFilms = async () => {
      const data = await fetchFilms();
      if (data) {
        setFilms(data);
      }
    };
    getFilms();
  }, []);

  return (
    <div>
      <h1>Available Films</h1>
      <ul>
        {films.map((film) => (
          <li key={film.id}>
            <h2>{film.title}</h2>
            <p>{film.description}</p>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default FilmList;
