import { useEffect, useState } from 'react';
import { api } from '~/services';
import { THEMOVIEDB_API_KEY } from '~/constants/firebase-constants';
import useRemoteConfig from './use-remote-config';

export const useFetch = ({ path }) => {
  const apiKey = useRemoteConfig({ key: THEMOVIEDB_API_KEY });
  const [response, setResponse] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const params = {
      api_key: "0864be8a90798694e64b7fa776169342",
    };

    api.get(path, { params })
      .then(({ data }) => {
		 
		  console.log("DATA                       ..............................."+data);
        setResponse(data);
        setLoading(false);
      })
      .catch((e) => {
		  console.log("ERROR-------------------------..............................."+e);
		   console.log("path-------------------------..............................."+path);
		    console.log("THEMOVIEDB_API_KEY"+THEMOVIEDB_API_KEY);
		   console.log("path-------------------------..............................."+params.api_key);
        setLoading(false);
      });
  }, []);

  return { loading, response };
};

export default useFetch;