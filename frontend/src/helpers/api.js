const API_BASE_URL = import.meta.env.VITE_API_BASE_URL;

export const fetchFilms = async () => {
  try {
      const response = await fetch(`${API_BASE_URL}/films`);
console.log(API_BASE_URL);
      if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
      }

      const data = await response.json();
      return data;
  } catch (error) {
      console.error('Error fetching films:', error.message);

      if (error instanceof SyntaxError) {
          console.error('Response is not valid JSON');
      }
      return null;
  }
};

export const fetchScreenings = async () => {
  try {
    const response = await fetch(`${API_BASE_URL}/screenings`);
    if (!response.ok) {
      throw new Error('Failed to fetch screenings');
    }
    return await response.json();
  } catch (error) {
    console.error('Error fetching screenings:', error);
    throw error;
  }
};
