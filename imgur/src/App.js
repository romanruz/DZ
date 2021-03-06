import React, {Component} from 'react';
import './App.css';
import {connect} from 'react-redux';
import {getApi} from './getApi';
import {Section} from './section';
import {Sort} from './sort';

class App extends Component {
    constructor(props) {
        super(props)
        this.state = {
            section: 'top',
            sort: 'top'
        };
    }

    componentWillMount() {
        this.props.Api(this.state);
    }

    //колбек что бы запрос отправился только после изменения стейта
    onSectionChange = (e) => {
        this.setState({section: e.target.value}, () => this.props.Api(this.state));
        console.log(this.props.gallery);
    }
    onSortChange = (e) => {
        this.setState({sort: e.target.value}, () => this.props.Api(this.state));
    }

    render() {
        return (<div>
            <Section onChange={this.onSectionChange.bind(this)}/>
            <Sort onChange={this.onSortChange.bind(this)}/>
            <div className='conteiner'>
                {
                    <ul>{
                        this.props.gallery.length
                            ? this.props.gallery.map((pic, index) => <li key={index}><img
                                src={this.props.gallery[index].images["0"].link} alt='wtf'/></li>)
                            : 'Loading'
                    }</ul>
                }
            </div>
        </div>);
    }
}

export default connect(state => ({
    gallery: state.length
        ? state[0].filter((item) => {
            return item.images
        })
        : []
}), dispatch => ({
    Api: params => {
        dispatch(getApi(params))
    }
}))(App);
