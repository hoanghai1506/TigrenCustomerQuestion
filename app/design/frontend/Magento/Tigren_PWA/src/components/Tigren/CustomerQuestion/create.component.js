import React, {useState} from 'react'
import { useMutation, gql } from '@apollo/client';
import './style.css'




const CREATE_POST_MUTATION = gql`
  mutation customerquestioncustom($customer_name: String!, $title: String!, $content: String!) {
    customerquestioncustom(name: $name, title: $title, content: $content) {
      id
      customer_name
      title
      content
    }
  }
`;
export default function Create() {
    const [customer_name, setName] = useState('');
    const [title, setTitle] = useState('');
    const [content, setContent] = useState('');

    const [createPost] = useMutation(CREATE_POST_MUTATION);

    const handleSubmit = async (event) => {
        event.preventDefault();
        await createPost({ variables: { customer_name, title, content } });
    };
    return (<div>

                <form className="form" onSubmit={handleSubmit} method="post">
                    <label className="form-label">
                        Name
                        <input
                            type="text"
                            name="customer_name"
                            placeholder="Name"
                            required
                            className="form-input"
                            value={customer_name}
                            onChange={(event) => setName(event.target.value)}

                        />
                    </label>
                    <label className="form-label">
                        Title
                        <input
                            type="text"
                            name="first-name"
                            placeholder="Title"
                            required
                            className="form-input"
                            value={title}
                            onChange={(event) => setTitle(event.target.value)}
                        />
                    </label>

                    <label className="form-label">
                        Content
                        <textarea
                            maxlenght="500"
                            name="message"
                            cols="30"
                            rows="10"
                            className="form-input"
                            placeholder="Content"
                            value={content}
                            onChange={(event) => setContent(event.target.value)}
                        ></textarea>
                    </label>
                    <div>
                        <button className="custom-btn-3 btn-9">Ask</button>
                    </div>

                </form>

        </div>);
}
