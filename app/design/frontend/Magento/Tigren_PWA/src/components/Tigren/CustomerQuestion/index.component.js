import React, {useState} from 'react'
import {gql, useMutation, useQuery} from '@apollo/client';
import {useHistory} from 'react-router-dom';

const GET_CUSTOMER_QUESTIONS = gql`
 query getAllCustomerQuestions {
  customerquestion {
    id
    customer_name
    title
    content
    created_at
  }
}
`;
const UPDATE_POST_MUTATION = gql`
  mutation customerquestionupdate($id: Int!, $name: String!, $title: String!, $content: String!) {
    customerquestionupdate(id: $id, name: $name, title: $title, content: $content) {
      id
      name
      title
      content
    }
  }
`;

export default function Index() {
    const history = useHistory();
    const {loading, error, data, refetch} = useQuery(GET_CUSTOMER_QUESTIONS, {
        refetchQueries: [{query: GET_CUSTOMER_QUESTIONS}],
    });
    const [editedData, setEditedData] = useState(null);

    const [updatePost] = useMutation(UPDATE_POST_MUTATION);
    const handleSubmit = async (event) => {
        event.preventDefault();
        await updatePost({
            variables: {
                id: editedData.id,
                name: editedData.customer_name,
                title: editedData.title,
                content: editedData.content
            }
        });
        setEditedData(null);
        refetch();
    };


    function handleEditClick(data) {
        setEditedData(data);
    }


    if (loading) return <p>Loading...</p>;
    if (error) return <p>Error :(</p>;
    return (
        <div>
            <h1>Customer Questions</h1>
            <div id="column-left">
                {data.customerquestion.map((dataItem) => {
                    if (editedData && editedData.id === dataItem.id) {
                        return (
                            <div className="testimonial-wrap" key={dataItem.id}>
                                <form onSubmit={handleSubmit} method="post">
                                    <article>
                                        <label className="form-label">
                                            name
                                            <input
                                                type="text"
                                                value={editedData.customer_name}
                                                onChange={(e) => setEditedData({
                                                    ...editedData,
                                                    customer_name: e.target.value
                                                })}
                                            />
                                        </label>

                                        <label className="form-label">
                                            Title
                                            <input
                                                type="text"
                                                value={editedData.title}
                                                onChange={(e) => setEditedData({...editedData, title: e.target.value})}
                                            />
                                        </label>
                                        <label className="form-label">
                                            Content
                                            <textarea
                                                value={editedData.content}
                                                onChange={(e) => setEditedData({
                                                    ...editedData,
                                                    content: e.target.value
                                                })}
                                            />
                                        </label>
                                        <br/>
                                        <button onClick={() => setEditedData(null)}
                                                className="custom-btn-3 btn-9">Cancel
                                        </button>
                                        <button type="submit" className="custom-btn-3 btn-9">Save</button>
                                    </article>
                                </form>
                            </div>
                        );
                    } else {
                        return (
                            <div className="testimonial-wrap" key={dataItem.id}>


                                <article>
                                    <p>
                                        <strong>Customer:</strong> {dataItem.customer_name}
                                    </p>
                                    <p> Title: {dataItem.title}</p>
                                    <p>
                                        {dataItem.content}
                                    </p>
                                    <br/>
                                    <p>
                                        <strong>Created:</strong> {dataItem.created_at}
                                    </p>
                                    <button className="custom-btn-2 btn-5"
                                            onClick={() => handleEditClick(dataItem)}>edit
                                    </button>
                                </article>
                            </div>

                        );
                    }
                })}


            </div>
        </div>

    );
}
