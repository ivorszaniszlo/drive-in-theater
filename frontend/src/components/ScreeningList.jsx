import React, { useEffect, useState } from 'react'; 
import PropTypes from 'prop-types';
import { fetchScreenings } from '../helpers/api';
import Card from '@mui/material/Card';
import CardContent from '@mui/material/CardContent';
import Typography from '@mui/material/Typography';
import Box from '@mui/material/Box';
import Grid from '@mui/material/Grid';
import { colors } from '@mui/material';

const ScreeningList = ({ film }) => {
  const [screenings, setScreenings] = useState([]);

  useEffect(() => {
    const getScreenings = async () => {
      try {
        const data = await fetchScreenings();
        if (data) {
          const filteredScreenings = data.filter(screening => screening.film_id === film.id);
          setScreenings(filteredScreenings);
        }
      } catch (error) {
        console.error('Error fetching screenings:', error);
      }
    };
    getScreenings();
  }, [film]);

  // Define a color palette and use the film ID to select a color consistently
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
  const backgroundColor = colorPalette[(film.id - 1) % colorPalette.length];

  return (
    <Box
      sx={{
        display: 'flex',
        justifyContent: 'center',
        alignItems: 'center',
        minHeight: '100vh',
        width: '100vw',
        backgroundColor: backgroundColor,
        padding: 4,
      }}
    >
      <Box sx={{ maxWidth: '1400px', width: '100%' }}>
        <Typography variant="h4" align="center" gutterBottom sx={{ fontSize: { xs: '1.5rem', md: '2rem' } }}>
          {film.title} - Screening Details
        </Typography>
        <Grid container spacing={3} justifyContent="center" alignItems="center">
          {screenings.map((screening) => (
            <Grid item xs={12} sm={6} md={4} key={screening.id}>
              <Card sx={{ maxWidth: 500, margin: '0 auto' }}>
                <CardContent>
                  <Typography 
                    variant="h6" 
                    component="div" 
                    sx={{
                      whiteSpace: 'normal',
                      fontSize: { xs: '1rem', sm: '1.25rem' }
                    }}
                  >
                    Date & Time: {new Date(screening.datetime).toLocaleString()}
                  </Typography>
                  <Typography variant="body2" color="text.secondary">
                    Available Seats: {screening.available_seats}
                  </Typography>
                </CardContent>
              </Card>
            </Grid>
          ))}
        </Grid>
      </Box>
    </Box>
  );
};

ScreeningList.propTypes = {
  film: PropTypes.shape({
    id: PropTypes.number.isRequired,
    title: PropTypes.string.isRequired,
  }).isRequired,
};

export default ScreeningList;
